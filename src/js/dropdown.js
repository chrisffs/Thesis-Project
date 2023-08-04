$(document).ready(function (){
let coursesList = [
    {Department: 'College of Engineering (COE)', Course: 'Bachelor of Science in Electronics Engineering [BSECE]'},
    {Department: 'College of Engineering (COE)', Course: 'Bachelor of Science in Mechanical Engineering [BSME]'},
    {Department: 'College of Engineering (COE)', Course: 'Bachelor of Science in Electrical Engineering [BSEE]'},
    {Department: 'College of Engineering (COE)', Course: 'Bachelor of Science in Computer Engineering [BSCpE]'},
    {Department: 'College of Automation and Control Engineering (COAC)', Course: 'Bachelor of Science in Mechatronics Engineering [BSMXE]'},
    {Department: 'College of Automation and Control Engineering (COAC)', Course: 'Bachelor of Science in Instrumentation and Control Engineering [BSICE]'},
    {Department: 'College of Automation and Control Engineering (COAC)', Course: 'Bachelor of Technology in Mechatronics Technology [BETMXT]'}, 
    {Department: 'College of Engineering Technology (COET)', Course: 'Bachelor of Science in Chemistry [BSChem]'},
    {Department: 'College of Engineering Technology (COET)', Course: 'Bachelor of Science in Engineering Technology [BET]'},
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