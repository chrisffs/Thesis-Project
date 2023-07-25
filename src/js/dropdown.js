$(document).ready(function (){
let coursesList = [
    {Department: 'College of Engineering', Course: 'Bachelor of Science in ELectronics Engineering'},
    {Department: 'College of Engineering', Course: 'Bachelor of Science in Mechanical Engineering'},
    {Department: 'College of Engineering', Course: 'Bachelor of Science in Electrical Engineering'},
    {Department: 'College of Engineering', Course: 'Bachelor of Science in Computer Engineering'},
    {Department: 'College of Automation and Control Engineering', Course: 'Bachelor of Science in Mechatronics Engineering'},
    {Department: 'College of Automation and Control Engineering', Course: 'Bachelor of Science in Instrumentation and Control Engineering'},
    {Department: 'College of Automation and Control Engineering', Course: 'Bachelor of Technology in Mechatronics Technology'},
    {Department: 'College of Engineering Technology', Course: 'Bachelor of Science in Chemistry'},
    {Department: 'College of Engineering Technology', Course: 'Bachelor of Science in Engineering Technology'},
]

$("#department").change(function () {
    $("#course").html("<option hidden selected>Choose Course</option>");
    const course = coursesList.filter(m => m.Department == $("#department").val());
    course.forEach(element => {
        const option = "<option val='" + element.Course + "'>" + element.Course + "</option>";
        $("#course").append(option);
    })
})
$(".yearpicker").yearpicker({
    startYear: 2012,
    endYear: 2030
  });
});