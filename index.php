<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8">
        <title>US Quiz</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
        <script>
        /*global $*/
        /*global _*/
        
            $(document).ready(function(){
                
                //Global Variables
                var score = 0;
                var attempts = localStorage.getItem("total_attempts");
                
                $("button").on("click", gradeQuiz);
                
                $(".q5Choice").on("click", function(){
                    $(".q5Choice").css("background","");
                    $(this).css("background","rgb(255,255,0");
                });
                
                $(".q10Choice").on("click", function(){
                    $(".q10Choice").css("background","");
                    $(this).css("background","rgb(255,255,0");
                });
                
                
                displayQ4Choices();
                displayQ9Choices();
                
                function displayQ4Choices(){
                    
                    let q4ChoicesArray = ["Maine", "Rhode Island", "Maryland", "Delaware"];
                    q4ChoicesArray = _.shuffle(q4ChoicesArray);
                    
                    for (let i = 0; i < q4ChoicesArray.length; i++){
                        $("#q4Choices").append(` <input type="radio" name="q4" id="${q4ChoicesArray[i]}" value="${q4ChoicesArray[i]}"> <label for="${q4ChoicesArray[i]}"> ${q4ChoicesArray[i]}</label>`);
                    }
                }//displayQ4Choices
                
                function displayQ9Choices(){
                    
                    let q9ChoicesArray = ["California", "Alaska", "Texas", "New York"];
                    q9ChoicesArray = _.shuffle(q9ChoicesArray);
                    
                    for (let i = 0; i < q9ChoicesArray.length; i++){
                        $("#q9Choices").append(` <input type="radio" name="q9" id="${q9ChoicesArray[i]}" value="${q9ChoicesArray[i]}"> <label for="${q9ChoicesArray[i]}"> ${q9ChoicesArray[i]}</label>`);
                    }
                }//displayQ9Choices
                
                
                    
                function isFormValid(){
                    let isValid = true;
                    if ($("#q1").val() == "") {
                        isValid = false;
                        $("#validationFdbk").html("Question 1 was not answered.");
                    }
                    else {
                        if ($("#q6").val() == "") {
                        isValid = false;
                        $("#validationFdbk").html("Question 6 was not answered.");
                        }
                        
                    }
                    return isValid;
                }    
                  
                function rightAnswer(index){
                    $(`#q${index}Feedback`).html("Correct!");
                    $(`#q${index}Feedback`).attr("class", "bg-success text-white");
                    $(`#markImg${index}`).html("<img src ='img/checkmark.png' alt='checkmark'>");
                    score += 10;
                }
                
                function wrongAnswer(index){
                    $(`#q${index}Feedback`).html("Incorrect!");
                    $(`#q${index}Feedback`).attr("class", "bg-warning text-white");
                    $(`#markImg${index}`).html("<img src ='img/xmark.png' alt='xmark'>");
                }  
                    
                function gradeQuiz(){
                    
                    $("#validationFdbk").html("");
                    
                    if (!isFormValid()){
                        return;
                    }
                    
                    //variables
                    score = 0;
                    let q1Response = $("#q1").val().toLowerCase();
                    let q2Response = $("#q2").val();
                    let q4Response = $("input[name=q4]:checked").val();
                    let q6Response = $("#q6").val().toLowerCase();
                    let q7Response = $("#q7").val();
                    let q9Response = $("input[name=q9]:checked").val();
                    
                    //Question 1
                    if(q1Response == "sacramento"){
                        rightAnswer(1);
                    }else{
                        wrongAnswer(1);
                    }
                    
                    //Question 2
                    if(q2Response == "mo"){
                        rightAnswer(2);
                    }else{
                        wrongAnswer(2);
                    }
                    
                    //Question 3
                    if($("#Jefferson").is(":checked") && $("#Roosevelt").is(":checked") && !$("#Jackson").is(":checked") && !$("#Franklin").is(":checked")){
                        rightAnswer(3);
                    }else{
                        wrongAnswer(3);
                    }
                    
                    //Question 4
                    if(q4Response == "Rhode Island"){
                        rightAnswer(4);
                    }else{
                        wrongAnswer(4);
                    }
                    
                    //Question 5
                    if($("#seal2").css("background-color") == "rgb(255, 255, 0)"){
                        rightAnswer(5);
                    }else{
                        wrongAnswer(5);
                    }
                    
                    $("#totalScore").html("Total Score: " + score);
                    
                    //Question 6
                    if(q6Response == "maine"){
                        rightAnswer(6);
                    }else{
                        wrongAnswer(6);
                    }
                    
                    //Question 7
                    if(q7Response == "hi"){
                        rightAnswer(7);
                    }else{
                        wrongAnswer(7);
                    }
                    
                    //Question 8
                    if($("#Colorado").is(":checked") && $("#Wyoming").is(":checked") && !$("#Arkanas").is(":checked") && !$("#Kansas").is(":checked")){
                        rightAnswer(8);
                    }else{
                        wrongAnswer(8);
                    }
                    
                    //Question 9
                    if(q9Response == "Alaska"){
                        rightAnswer(9);
                    }else{
                        wrongAnswer(9);
                    }
                    
                    //Question 10
                    if($("#lake5").css("background-color") == "rgb(255, 255, 0)"){
                        rightAnswer(10);
                    }else{
                        wrongAnswer(10);
                    }
                    
                    $("#totalScore").html("Total Score: " + score);
                    
                    //alter text based on getting a good grade
                    if (score >= 80)
                    {
                        $("#totalScore").attr("class", "text-success");
                        $("#congratsMessage").html("Congratulations on getting a good score!");
                    }else{
                        $("#totalScore").attr("class", "text-danger");
                    }
                    
                    
                    $("#totalAttempts").html(`Total Attempts: ${++attempts}`);
                    localStorage.setItem("total_attempts", attempts);
                }
                
            })//ready
        </script>
    </head>
    <body class="text-center">
        
        <h1 class="jumbotron"> US Geography Quiz</h1>
        
        <h3><span id="markImg1"></span>What is the capital of California?</h3>
        <input type="text" id="q1">
        <br><br>
        <div id="q1Feedback"></div>
        <br>
        
        <h3><span id="markImg2"></span>What is the longest river?</h3>
        <select id="q2">
            <option value="">Select One</option>
            <option value="ms">Mississippi</option>
            <option value="mo">Missouri</option>
            <option value="co">Colorado</option>
            <option value="de">Delaware</option>
        </select>
        <br><br>
        <div id="q2Feedback"></div>
        <br>
        
        <h3><span id="markImg3"></span>What presidents are carved into Mount Rushmore?</h3>
        <input type="checkbox" id="Jackson"> <label for "Jackson"> A. Jackson</label>
        <input type="checkbox" id="Franklin"> <label for "Franklin">B. Franklin</label>
        <input type="checkbox" id="Jefferson"> <label for "Jefferson">T. Jefferson</label>
        <input type="checkbox" id="Roosevelt"> <label for "Roosevelt">T. Roosevelt</label>
        <br><br>
        <div id="q3Feedback"></div>
        <br>
        
        <h3><span id="markImg4"></span>What is the smallest US State?</h3>
        <div id="q4Choices"></div>
        <div id="q4Feedback"></div>
        <br><br>
        
        
        <h3><span id="markImg5"></span>What image is in the Great Seal of the State of California?</h3>
        <img src="img/seal1.png" alt="Seal 1" class="q5Choice" id="seal1">
        <img src="img/seal2.png" alt="Seal 2" class="q5Choice" id="seal2">
        <img src="img/seal3.png" alt="Seal 3" class="q5Choice" id="seal3">
        <div id="q5Feedback"></div>
        <br><br>
        
        <!-- Questions not part of the lab walkthrough -->
        
        <h3><span id="markImg6"></span>What is the name of the state in the northeast corner of the continental United States?</h3>
        <input type="text" id="q6">
        <br><br>
        <div id="q6Feedback"></div>
        <br>
        
        <h3><span id="markImg7"></span>Which is the largest Hawaiian island?</h3>
        <select id="q7">
            <option value="">Select One</option>
            <option value="hi">Hawai'i</option>
            <option value="ma">Maui</option>
            <option value="mo">Moloka'i</option>
            <option value="ka">Kaho'olawe</option>
        </select>
        <br><br>
        <div id="q7Feedback"></div>
        <br>
        
        <h3><span id="markImg8"></span>Which states are approximately rectangular?</h3>
        <input type="checkbox" id="Colorado"> <label for "Colorado"> Colorado</label>
        <input type="checkbox" id="Arkansas"> <label for "Arkansas">Arkansas</label>
        <input type="checkbox" id="Wyoming"> <label for "Wyoming">Wyoming</label>
        <input type="checkbox" id="Kansas"> <label for "Kansas">Kansas</label>
        <br><br>
        <div id="q8Feedback"></div>
        <br>
        
        <h3><span id="markImg9"></span>What is the largest US State?</h3>
        <div id="q9Choices"></div>
        <div id="q9Feedback"></div>
        <br><br>
        
        
        <h3><span id="markImg10"></span>Where is Lake Erie?</h3>
        <img src="img/greatlakes1.png" alt="Great Lakes 1" class="q10Choice" id="lake1">
        <img src="img/greatlakes2.png" alt="Great Lakes 2" class="q10Choice" id="lake2">
        <img src="img/greatlakes3.png" alt="Great Lakes 3" class="q10Choice" id="lake3">
        <img src="img/greatlakes4.png" alt="Great Lakes 4" class="q10Choice" id="lake4">
        <img src="img/greatlakes5.png" alt="Great Lakes 5" class="q10Choice" id="lake5">
        <div id="q10Feedback"></div>
        <br><br>
        
        <h3 id="validationFdbk" class="bg-danger text-white"></h3>
        <button class="btn btn-outline-info"> Submit Quiz </button>
        <br>
        <h2 id="totalScore" class="text-info"></h2>
        <h2 id="congratsMessage"></h2>
        
        <h3 id="totalAttempts"></h3>
        
        <footer>
            <hr>CST336 Internet Programming. Copyright Sean Wilson &copy;2020<br>
            Great Lakes image credit: <a href="https://healthylakes.org/2020-budget-a-win-for-the-great-lakes/">https://healthylakes.org/2020-budget-a-win-for-the-great-lakes/</a><br>
            <a href="http://www.csumb.edu"><img src="img/csumb.png" alt ="The CSUMB Logo" width="200"></a>
        </footer>
        
    </body>
</html>