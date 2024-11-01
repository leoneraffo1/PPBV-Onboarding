<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $course = Course::join("course_has_users", "course_has_users.course_fk", "=", "courses.id")
            ->where("course_has_users.user_fk", $user->id)
            ->select("courses.*")
            ->get();

        return response()->json($course);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            "name" => 'required|string'
        ]);

        $course = Course::create($validated);
        $course->users()->attach($user->id);
        return response()->json(["message" => "Curso criado com sucesso", "course" => $course], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return $course;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            "name" => 'required|string'
        ]);

        $course->update($validated);

        return response()->json(["message" => "Curso alterado com sucesso", "course" => $course], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return response()->json(["Curso excluido com sucesso"], 204);
    }

    public function vinculateUser(Request $request, Course $course)
    {
        $user = $request->user;
        $course->users()->attach($user);

        return response()->json(["message" => "Usuário vinculado ao curso com sucesso"], 200);
    }

    public function showCourseUsers(Request $request, Course $course)
    {
        $course->load(["users:id,name,email,type_user_fk"]);
        return response()->json($course);
    }
}
