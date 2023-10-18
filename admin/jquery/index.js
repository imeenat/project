function addCourse(){
    // var input1 = "<input type='text' placeholder='Enter a course'>";
    // var option1 = "<select name='' id='add'> <option value ='core'>Core</option><option value ='elective'>Elective</option></select>";
    
    // var btn = "<button onclick='addCourse();' width='22px' height='22px'>+</button>";
    $(document).ready(function(){
        $("button").click(function(){
            // $(".course").append(input1, option1, btn);
            $(".course").hide();
        });
    });
}

