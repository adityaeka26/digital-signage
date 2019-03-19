var hour
var minute
var day
function display_ct() {
    var now = new Date()
    var month = now.getMonth() + 1
    var date = now.getDate()
    var year = now.getFullYear()
    if (now.getDay() == 0) {
        day = "Minggu"
    } else if (now.getDay() == 1) {
        day = "Senin"
    } else if (now.getDay() == 2) {
        day = "Selasa"
    } else if (now.getDay() == 3) {
        day = "Rabu"
    } else if (now.getDay() == 4) {
        day = "Kamis"
    } else if (now.getDay() == 5) {
        day = "Jumat"
    } else if (now.getDay() == 6) {
        day = "Sabtu"
    }
    minute = now.getMinutes()
    hour = now.getHours()
    var second = now.getSeconds()
    var time = 
        day + ", " + 
        date + "/" + month + "/" + year + " " + 
        hour + ":" + minute + ":" + second;
    document.getElementById("time").innerHTML = time
    setTimeout("display_ct()", 1000)
}