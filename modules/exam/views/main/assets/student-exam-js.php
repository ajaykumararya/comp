<style>
    .option {
        background: #f1f1f1;
        padding: 10px;
        border-radius: 8px;
        margin: 5px 0;
        cursor: pointer;
        transition: 0.3s;
    }

    .option:hover {
        background: #dfe6e9;
    }

    .option.selected {
        background: #74b9ff !important;
    }

    button {
        background: #0984e3;
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: 600;
        margin: 5px;
    }

    button:hover {
        background: #74b9ff;
    }

    .timer {
        font-weight: bold;
        color: #d63031;
        margin-bottom: 10px;
    }
</style>
<script>
    try {
        // ==========================
        // GLOBAL VARIABLES
        // ==========================
        let bootboxActive = false;
        let questions = [];
        let userAnswers = [];
        let currentQuestion = 0;
        let timeLeft = 60;
        let timerInterval;
        let token = '';

        $(document).ready(function () {

            // TIMER BADGE PART (UNCHANGED)
            function getTimecal(total) {
                let hours = Math.floor(total / 3600);
                let minutes = Math.floor((total % 3600) / 60);
                let seconds = total % 60;

                let result = [];
                if (hours > 0) result.push(hours + " Hour" + (hours > 1 ? "s" : ""));
                if (minutes > 0) result.push(minutes + " Minute" + (minutes > 1 ? "s" : ""));
                if (seconds > 0 || total === 0)
                    result.push(seconds + " Second" + (seconds > 1 ? "s" : ""));

                return result.join(" ");
            }

            // REMOVEON TIMER LOGIC (UNCHANGED)
            $('[removeon]').each(function (i, v) {
                var get = parseInt($(v).attr("removeon"));
                if (get > 0) {
                    let c = setInterval(function () {
                        var get = parseInt($(v).attr('removeon'));
                        if (get > 0) {
                            let second = get - 1;
                            $(v).attr('removeon', second);
                            let msg = badge('Session Expired on ' + getTimecal(second) + '.', 'warning timer text-black');

                            let parent = $(v).closest('td');
                            if ($(parent).find('.timer').length)
                                $(parent).find('.timer').remove();

                            $(parent).append(msg)
                        }
                        else {
                            $(v).closest('td').html(badge('Sorry! Your exam has been expired.', 'danger'));
                            clearInterval(c);
                        }
                    }, 1000);
                }
            });

            // ==========================
            // EXAM START CLICK
            // ==========================
            $(document).on('click', '.exam-start-button', function (e) {
                e.preventDefault();
                token = $(this).attr('paper-token');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to start the exam now!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Start it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.AryaAjax({
                            url: '{base_url}exam/ajax/get-paper-via-token',
                            data: { token },
                        }).then(function (response) {

                            if (response?.questions.length) {

                                // SET GLOBALS
                                questions = response.questions;
                                userAnswers = new Array(questions.length).fill(null);
                                currentQuestion = 0;
                                timeLeft = response?.duration ?? 60; // dynamic duration
                                bootboxActive = false;

                                showQuestion(currentQuestion);
                            }
                        });
                    }
                });
            });

        }); // document ready ends



        // ================================
        // SHOW QUESTION
        // ================================
        function showQuestion(index) {
            if (index >= questions.length) {
                finishQuiz();
                return;
            }

            const q = questions[index];

            let optionsHtml = q.options.map(opt => {
                let cls = (userAnswers[index] === opt.id) ? "option selected" : "option";
                return `<div class="${cls} text-dark" onclick="selectOption(${index},${opt.id},this)">${opt.text}</div>`;
            }).join("");

            let html = `
            <div class="timer">⏳ Time left: <span id="time">${timeLeft}</span>s</div>
            <div class="question"><strong>Q${index + 1}.</strong> ${q.q}</div>
            ${optionsHtml}
            <div style="margin-top:10px;">
                <button onclick="prevQuestion()">⬅️ Prev</button>
                <button onclick="skipQuestion()">⏭️ Skip</button>
                <button onclick="nextQuestion()">Next ➡️</button>
            </div>
        `;

            if (!bootboxActive) {
                bootboxActive = true;
                bootbox.dialog({
                    title: "<h4>🧠 Quiz Challenge</h4>",
                    message: html,
                    closeButton: false,
                    backdrop: "static"
                });
                startTimer();
            } else {
                $(".bootbox-body").html(html);
            }
        }

        function selectOption(qIndex, optId, el) {
            userAnswers[qIndex] = optId;
            $(el).parent().children().removeClass("selected");
            $(el).addClass("selected");
        }

        // ================================
        // CONTROLS
        // ================================
        function prevQuestion() {
            if (currentQuestion > 0) {
                currentQuestion--;
                showQuestion(currentQuestion);
            }
        }

        function nextQuestion() {
            currentQuestion++;
            showQuestion(currentQuestion);
        }

        function skipQuestion() {
            currentQuestion++;
            showQuestion(currentQuestion);
        }

        // ================================
        // TIMER START
        // ================================
        function startTimer() {
            timerInterval = setInterval(() => {
                timeLeft--;
                $("#time").text(timeLeft);

                if (timeLeft <= 0) finishQuiz();
            }, 1000);
        }

        // ================================
        // FINISH QUIZ
        // ================================
        function finishQuiz() {
            clearInterval(timerInterval);
            bootbox.hideAll();

            let savedData = [];

            questions.forEach((q, i) => {
                savedData.push({
                    question_id: q.id,
                    selected_option_id: userAnswers[i] ?? 0
                });
            });

            // bootbox.alert({
            //     title: "Exam Finished.",
            //     message: `
            //     <p><strong>Saved Data (Question + Option IDs):</strong></p>
            //     <pre>${JSON.stringify(savedData, null, 2)}</pre>
            // `
            // });
            $.AjaxAjax({
                url: '{base_url}exam/ajax/save-student-exam',
                method: 'POST',
                data: {
                    token,
                    answers: savedData
                }
            });
            console.log(savedData);
        }


    } catch (e) {
        alert("Something went wrong...");
    }
</script>