<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <script src="https://fast.conpass.io/RmCs_jtOB7NWT.js"></script>

    <style>
        .my-chat-icon-class.support-chat-icon {
            background-color: #0078F0 !important;
            background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9Im5vIj8+CjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNC4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDQzMzYzKSAgLS0+Cgo8c3ZnCiAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgeG1sbnM6Y2M9Imh0dHA6Ly9jcmVhdGl2ZWNvbW1vbnMub3JnL25zIyIKICAgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIgogICB4bWxuczpzdmc9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIgogICB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiAgIHhtbG5zOnNvZGlwb2RpPSJodHRwOi8vc29kaXBvZGkuc291cmNlZm9yZ2UubmV0L0RURC9zb2RpcG9kaS0wLmR0ZCIKICAgeG1sbnM6aW5rc2NhcGU9Imh0dHA6Ly93d3cuaW5rc2NhcGUub3JnL25hbWVzcGFjZXMvaW5rc2NhcGUiCiAgIHZlcnNpb249IjEuMSIKICAgaWQ9IkxheWVyXzEiCiAgIHg9IjBweCIKICAgeT0iMHB4IgogICB3aWR0aD0iMTAwJSIKICAgaGVpZ2h0PSIxMDAlIgogICB2aWV3Qm94PSIwIDAgMjQgMjQiCiAgIHhtbDpzcGFjZT0icHJlc2VydmUiCiAgIHNvZGlwb2RpOmRvY25hbWU9ImNoYXQtb2ZmbGluZS5zdmciCiAgIGlua3NjYXBlOnZlcnNpb249IjAuOTIuMyAoMjQwNTU0NiwgMjAxOC0wMy0xMSkiPjxtZXRhZGF0YQogICBpZD0ibWV0YWRhdGE4MSI+PHJkZjpSREY+PGNjOldvcmsKICAgICAgIHJkZjphYm91dD0iIj48ZGM6Zm9ybWF0PmltYWdlL3N2Zyt4bWw8L2RjOmZvcm1hdD48ZGM6dHlwZQogICAgICAgICByZGY6cmVzb3VyY2U9Imh0dHA6Ly9wdXJsLm9yZy9kYy9kY21pdHlwZS9TdGlsbEltYWdlIiAvPjwvY2M6V29yaz48L3JkZjpSREY+PC9tZXRhZGF0YT48ZGVmcwogICBpZD0iZGVmczc5IiAvPjxzb2RpcG9kaTpuYW1lZHZpZXcKICAgcGFnZWNvbG9yPSIjZmZmZmZmIgogICBib3JkZXJjb2xvcj0iIzY2NjY2NiIKICAgYm9yZGVyb3BhY2l0eT0iMSIKICAgb2JqZWN0dG9sZXJhbmNlPSIxMCIKICAgZ3JpZHRvbGVyYW5jZT0iMTAiCiAgIGd1aWRldG9sZXJhbmNlPSIxMCIKICAgaW5rc2NhcGU6cGFnZW9wYWNpdHk9IjAiCiAgIGlua3NjYXBlOnBhZ2VzaGFkb3c9IjIiCiAgIGlua3NjYXBlOndpbmRvdy13aWR0aD0iMzI2NSIKICAgaW5rc2NhcGU6d2luZG93LWhlaWdodD0iMTU5MCIKICAgaWQ9Im5hbWVkdmlldzc3IgogICBzaG93Z3JpZD0iZmFsc2UiCiAgIGlua3NjYXBlOnpvb209IjQ1LjI1NDgzNCIKICAgaW5rc2NhcGU6Y3g9IjEyIgogICBpbmtzY2FwZTpjeT0iMTEiCiAgIGlua3NjYXBlOndpbmRvdy14PSI0MTA4IgogICBpbmtzY2FwZTp3aW5kb3cteT0iMTg3IgogICBpbmtzY2FwZTp3aW5kb3ctbWF4aW1pemVkPSIwIgogICBpbmtzY2FwZTpjdXJyZW50LWxheWVyPSJMYXllcl8xIiAvPgo8IS0tPHBhdGggZmlsbD0iI0Q5MjcyRCIgZD0iTTcxNy4zMTYsNDQxLjk3YzAsOTMuOTMxLTc2LjE0NSwxNzAuMDc0LTE3MC4wNzgsMTcwLjA3NGMtOTMuOTMxLDAtMTcwLjA4My03Ni4xNDQtMTcwLjA4My0xNzAuMDc0CgljMC05My45MzcsNzYuMTUyLTE3MC4wODEsMTcwLjA4My0xNzAuMDgxQzY0MS4xNzIsMjcxLjg4OSw3MTcuMzE2LDM0OC4wMzMsNzE3LjMxNiw0NDEuOTd6Ii8+LS0+CiAgICA8ZwogICBpZD0iZzc0IgogICB0cmFuc2Zvcm09Im1hdHJpeCgwLjA5NTM0MzM4LDAsMCwwLjA5NTM0MzM4LC0zOS43Mzk2MSwtMzAuMDA1OTkpIj4KCTxwYXRoCiAgIGQ9Im0gNTAwLjIxMSw1NDEuMzY5IGMgMCwyLjAxNSAxLjEzOSwzLjg1NSAyLjk0MSw0Ljc1MSAwLjc1MiwwLjM3NCAxLjU2MSwwLjU2IDIuMzY5LDAuNTYgMS4xMzMsMCAyLjI1OCwtMC4zNjIgMy4xOTcsLTEuMDY5IGwgMjYuOTA3LC0yMC4yODYgLTM1LjQxNSwtMTcuODcxIHYgMzMuOTE1IHoiCiAgIGlkPSJwYXRoNzAiCiAgIGlua3NjYXBlOmNvbm5lY3Rvci1jdXJ2YXR1cmU9IjAiCiAgIHN0eWxlPSJmaWxsOiNmZmZmZmYiIC8+CiAgICAgICAgPHBhdGgKICAgZD0ibSA2NDEuOTg0LDM1MC42MjMgYyAtMS4yOTMsLTEuMTcxIC0yLjk1MSwtMS43ODIgLTQuNjMsLTEuNzgyIC0wLjk2MiwwIC0xLjkzMSwwLjIwMiAtMi44NDQsMC42MTQgbCAtMjAwLjI4LDkwLjU1NyBjIC0yLjQyNCwxLjA5NiAtNC4wMDQsMy40ODQgLTQuMDU5LDYuMTQzIC0wLjA1OSwyLjY1OCAxLjQxOCw1LjExNiAzLjc5Miw2LjMxMSBsIDU5LjY1MSwzMC4wOTggNjcuMzY3LC02MS40NjYgYyAxLjc4MiwtMS42MjYgNC4wOSwtMi41MjIgNi41MDIsLTIuNTIyIDIuNzA3LDAgNS4zMDgsMS4xNDggNy4xMzEsMy4xNDggMS43MzYsMS45MDEgMi42MjksNC4zNjggMi41MSw2Ljk0MiAtMC4xMTUsMi41NzcgLTEuMjMxLDQuOTUxIC0zLjEzNyw2LjY4OCBsIC02MS45MzgsNTYuNTExIDY3LjMzMywzMy45NzMgYyAwLjk3OCwwLjQ5MyAyLjA0NCwwLjczOSAzLjExLDAuNzM5IDAuODkzLDAgMS43ODUsLTAuMTc0IDIuNjI5LC0wLjUxOSAxLjg1NCwtMC43NjMgMy4yODUsLTIuMjkzIDMuOTIsLTQuMTk0IGwgNTQuODYsLTE2My45MjcgYyAwLjg3NCwtMi42IDAuMTIsLTUuNDczIC0xLjkxNywtNy4zMTQgeiIKICAgaWQ9InBhdGg3MiIKICAgaW5rc2NhcGU6Y29ubmVjdG9yLWN1cnZhdHVyZT0iMCIKICAgc3R5bGU9ImZpbGw6I2ZmZmZmZiIgLz4KPC9nPgo8L3N2Zz4=) !important;
        }

        .spartez-support-chat-container .top-header {
            background-color: #0078F0 !important;
        }

        .chats-list button.new-conversation {
            background-color: #0078F0 !important;
        }

        .chat-message {
            background-color: #0078F0 !important;
            color: white !important;
        }

        /*este é o box do chat do usuario (nao do agente)*/
        .chat-message.my[data-v-230549d4] {
            background-color: #E6E9EB !important;
            color: black !important;
        }

        .chat-message.my .text>p {
            background-color: #E6E9EB !important;
            color: black !important;
        }

        .chat-message .text>p {
            background-color: #0078F0 !important;
            color: white !important;
        }

        /*botao de envio mensagem*/
        .message-entry .message-entry-flex button.send-message[data-v-4f2d6a12]:disabled {
            background-color: #A8ABAD !important;
        }

        .message-entry .message-entry-flex button.send-message {
            background-color: #0078F0 !important;
        }
    </style>
</head>

<body>
    <div id="root"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        if (window.Conpass) {
            window.Conpass.init();
        }
    </script>
    <script src="https://chat-api.spartez-software.com/chat-widget.js" defer></script>
    <chat-widget jira-id="d74f87f5-b426-3508-b02e-93b883bfba5c" service-desk-id="34"></chat-widget>
</body>

</html>