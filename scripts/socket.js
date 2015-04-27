$(function () {
    var conn = new WebSocket('ws://127.0.0.1:5555');
    conn.onopen = function (e) {
        alert("connection established");
    };
    conn.onmessage = function (e) {
        alert(e.data);
    };
});