<?= $this->include('layouts/header') ?>

<h2 class="section-title text-center">🧠 Create New Quiz</h2>

<div class="card quiz-card">
    <form id="quizForm" autocomplete="off">
        <!-- Quiz Title -->
        <div class="form-group">
            <label>Quiz Title</label>
            <input type="text" name="title" class="input" placeholder="e.g., Static GK Class 10" required>
        </div>

        <!-- Subject Selection -->
        <div class="form-group">
            <label>Subject</label>
            <select name="subject_id" class="input" required>
                <option value="">-- Select Subject --</option>
                <?php foreach ($subjects as $s): ?>
                    <option value="<?= $s['id'] ?>"><?= esc($s['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Question Inputs -->
        <div id="questionArea">
            <h4>➕ Add Question</h4>
            <textarea id="question" class="input" placeholder="Enter question..."></textarea>

            <div class="option-grid">
                <input type="text" id="optionA" class="input" placeholder="Option A">
                <input type="text" id="optionB" class="input" placeholder="Option B">
                <input type="text" id="optionC" class="input" placeholder="Option C">
                <input type="text" id="optionD" class="input" placeholder="Option D">
            </div>

            <select id="correctOption" class="input">
                <option value="">Correct Option</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>

            <button type="button" id="addQuestion" class="btn btn-add">Add Question</button>
        </div>

        <!-- Questions Table -->
        <div class="table-wrapper">
            <table class="user-table" id="questionTable" style="display:none;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Correct</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>

        <!-- Submit All -->
        <div class="btn-container">
            <button type="button" id="submitQuiz" class="btn btn-submit">Submit Quiz</button>
        </div>
    </form>
</div>

<style>
/* ---------- Base Card ---------- */
.quiz-card {
    max-width: 850px;
    background: #fff;
    border-radius: 10px;
    margin: 30px auto;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* ---------- Headings ---------- */
.section-title {
    margin-top: 20px;
    font-size: 1.8rem;
    color: #e10600;
    font-weight: 700;
}

/* ---------- Form Styling ---------- */
.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
}

.input, textarea, select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    outline: none;
    font-size: 15px;
    transition: border-color 0.3s ease;
}

.input:focus, textarea:focus, select:focus {
    border-color: #e10600;
}

/* ---------- Question Area ---------- */
#questionArea h4 {
    font-size: 1.2rem;
    margin-bottom: 10px;
    color: #333;
}

.option-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
    margin-top: 10px;
}

/* ---------- Buttons ---------- */
.btn {
    display: inline-block;
    padding: 10px 18px;
    font-size: 15px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.btn:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

.btn-add {
    background-color: #e10600;
    color: #fff;
    margin-top: 12px;
}

.btn-submit {
    background-color: #27ae60;
    color: #fff;
}

.btn-edit {
    background-color: #f39c12;
    color: #fff;
    margin-right: 5px;
}

.btn-delete {
    background-color: #c0392b;
    color: #fff;
}

/* ---------- Table ---------- */
.table-wrapper {
    width: 100%;
    overflow-x: auto;
    margin-top: 25px;
}

.user-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 600px;
}

.user-table th, .user-table td {
    border: 1px solid #ddd;
    padding: 10px 12px;
    text-align: left;
    vertical-align: middle;
    font-size: 14px;
}

.user-table th {
    background-color: #e10600;
    color: white;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.user-table td {
    background-color: #fff;
}

.btn-container {
    text-align: center;
    margin-top: 25px;
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
    .quiz-card {
        padding: 20px;
        margin: 15px;
    }

    .option-grid {
        grid-template-columns: 1fr;
    }

    .btn {
        width: 100%;
        margin-top: 10px;
    }

    .user-table th, .user-table td {
        font-size: 13px;
        padding: 8px;
    }

    h2.section-title {
        font-size: 1.5rem;
    }
}

@media (max-width: 480px) {
    .quiz-card {
        padding: 15px;
    }

    .btn {
        font-size: 14px;
        padding: 9px;
    }

    textarea {
        height: 80px;
    }
}
</style>


<script>
let questions = [];
let editIndex = -1;

// Add or Update Question
$("#addQuestion").click(function(){
    const q = {
        question: $("#question").val(),
        option_a: $("#optionA").val(),
        option_b: $("#optionB").val(),
        option_c: $("#optionC").val(),
        option_d: $("#optionD").val(),
        correct_option: $("#correctOption").val()
    };

    if(!q.question || !q.correct_option){
        showToast("Please fill question and correct option!", "error");
        return;
    }

    if(editIndex >= 0){
        questions[editIndex] = q; // update
        editIndex = -1;
        $("#addQuestion").text("Add Question");
    } else {
        questions.push(q); // add new
    }

    updateTable();
    clearInputs();
});

// Update table
function updateTable(){
    let tbody = $("#questionTable tbody");
    tbody.empty();
    questions.forEach((q, i) => {
        tbody.append(`<tr>
            <td>${i+1}</td>
            <td>${q.question}</td>
            <td>${q.correct_option}</td>
            <td>
                <button type="button" class="btn btn-edit" data-index="${i}">✏️ Edit</button>
                <button type="button" class="btn btn-delete" data-index="${i}">🗑️ Delete</button>
            </td>
        </tr>`);
    });
    $("#questionTable").toggle(questions.length > 0);
}

// Edit question
$(document).on("click", ".btn-edit", function(){
    editIndex = $(this).data("index");
    const q = questions[editIndex];
    $("#question").val(q.question);
    $("#optionA").val(q.option_a);
    $("#optionB").val(q.option_b);
    $("#optionC").val(q.option_c);
    $("#optionD").val(q.option_d);
    $("#correctOption").val(q.correct_option);
    $("#addQuestion").text("Update Question");
});

// Delete question
$(document).on("click", ".btn-delete", function(){
    const index = $(this).data("index");
    questions.splice(index, 1);
    updateTable();
});

// Clear inputs
function clearInputs(){
    $("#questionArea input, #questionArea textarea").val('');
    $("#correctOption").val('');
}

// Submit all
$("#submitQuiz").click(function(){
    const subject_id = $("select[name='subject_id']").val();
    const title = $("input[name='title']").val();

    if(!subject_id || !title || questions.length === 0){
        showToast("Please fill all fields and add at least one question!", "error");
        return;
    }

    $.post("/admin/quiz/store", {
        subject_id: subject_id,
        title: title,
        questions: JSON.stringify(questions)
    }, function(res){
        if(res.success){
            showToast("✅ Quiz saved successfully!", "success");
            $("#quizForm")[0].reset();
            $("#questionTable tbody").empty();
            $("#questionTable").hide();
            questions = [];
            $("#addQuestion").text("Add Question");
        }
    });
});
</script>



<?= $this->include('layouts/footer') ?>
