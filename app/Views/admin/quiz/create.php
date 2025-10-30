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
            <textarea id="question" class="input" placeholder="Enter question..." required></textarea>

            <div class="option-grid pb-4">
                <input type="text" id="optionA" class="input" placeholder="Option A" required>
                <input type="text" id="optionB" class="input" placeholder="Option B" required>
                <input type="text" id="optionC" class="input" placeholder="Option C" required>
                <input type="text" id="optionD" class="input" placeholder="Option D" required>
            </div>

            <select id="correctOption" class="input" required>
                <option value="">Correct Option</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>

            <button type="button" id="addQuestion" class="btn btn-add">
                <i class="fa-solid fa-plus"></i> Add Question
            </button>
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
            <button type="button" id="submitQuiz" class="btn btn-submit">
                <i class="fa-solid fa-paper-plane"></i> Submit Quiz
            </button>
        </div>
    </form>
</div>

<!-- ✅ Font Awesome -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> -->

<style>
/* ---------- General ---------- */
body {
    background: #f7f7f7;
    font-family: "Poppins", sans-serif;
}

.quiz-card {
    max-width: 850px;
    background: #fff;
    border-radius: 12px;
    margin: 30px auto;
    padding: 25px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.section-title {
    margin: 25px 0 15px;
    color: #e10600;
    font-weight: 700;
}

/* ---------- Form Fields ---------- */
.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: 600;
    margin-bottom: 8px;
    display: block;
    color: #333;
}

.input, textarea, select {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    outline: none;
    transition: border-color 0.3s;
}

.input:focus, textarea:focus, select:focus {
    border-color: #e10600;
}

textarea {
    height: 80px;
    resize: none;
}

/* ---------- Option Grid ---------- */
.option-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 12px;
}

/* ---------- Buttons ---------- */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 10px 16px;
    font-size: 14px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    transition: all 0.2s ease;
}

.btn:hover {
    transform: translateY(-1px);
    opacity: 0.95;
}

.btn-add {
    background-color: #e10600;
    color: #fff;
    width: 100%;
    margin-top: 10px;
}

.btn-submit {
    background-color: #28a745;
    color: #fff;
    width: 100%;
}

/* ---------- Action Buttons ---------- */
.btn-edit, .btn-delete {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-edit {
    background-color: #007bff;
}
.btn-edit:hover {
    background-color: #0056b3;
}

.btn-delete {
    background-color: #dc3545;
}
.btn-delete:hover {
    background-color: #a71d2a;
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
    color: #fff;
    text-transform: uppercase;
}

.user-table td:last-child {
    text-align: center;
}

.user-table td button {
    margin: 0 4px;
}

/* ---------- Responsive ---------- */
@media (max-width: 768px) {
    .quiz-card {
        padding: 18px;
        margin: 15px;
    }
    .option-grid {
        grid-template-columns: 1fr;
    }
    .btn {
        font-size: 13px;
        padding: 9px;
    }
    .user-table th, .user-table td {
        font-size: 12px;
        padding: 8px;
    }
}
</style>

<script>
let questions = [];
let editIndex = -1;

$("#addQuestion").click(function () {
    const q = {
        question: $("#question").val(),
        option_a: $("#optionA").val(),
        option_b: $("#optionB").val(),
        option_c: $("#optionC").val(),
        option_d: $("#optionD").val(),
        correct_option: $("#correctOption").val()
    };

    if (!q.question || !q.correct_option) {
        showToast("Please fill question and correct option!", "error");
        return;
    }

    if (editIndex >= 0) {
        questions[editIndex] = q;
        editIndex = -1;
        $("#addQuestion").html('<i class="fa-solid fa-plus"></i> Add Question');
    } else {
        questions.push(q);
    }

    updateTable();
    clearInputs();
});

function updateTable() {
    let tbody = $("#questionTable tbody");
    tbody.empty();
    questions.forEach((q, i) => {
        tbody.append(`
            <tr>
                <td>${i + 1}</td>
                <td>${q.question}</td>
                <td>${q.correct_option}</td>
                <td>
                    <button type="button" class="btn-edit" data-index="${i}">
                        <i class="fa-solid fa-pen"></i>
                    </button>
                    <button type="button" class="btn-delete" data-index="${i}">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </td>
            </tr>
        `);
    });
    $("#questionTable").toggle(questions.length > 0);
}

$(document).on("click", ".btn-edit", function () {
    editIndex = $(this).data("index");
    const q = questions[editIndex];
    $("#question").val(q.question);
    $("#optionA").val(q.option_a);
    $("#optionB").val(q.option_b);
    $("#optionC").val(q.option_c);
    $("#optionD").val(q.option_d);
    $("#correctOption").val(q.correct_option);
    $("#addQuestion").html('<i class="fa-solid fa-rotate"></i> Update Question');
});

$(document).on("click", ".btn-delete", function () {
    const index = $(this).data("index");
    questions.splice(index, 1);
    updateTable();
});

function clearInputs() {
    $("#questionArea input, #questionArea textarea").val('');
    $("#correctOption").val('');
}

$("#submitQuiz").click(function () {
    const subject_id = $("select[name='subject_id']").val();
    const title = $("input[name='title']").val();

    if (!subject_id || !title || questions.length === 0) {
        showToast("Please fill all fields and add at least one question!", "error");
        return;
    }

    $.post("/admin/quiz/store", {
        subject_id,
        title,
        questions: JSON.stringify(questions)
    }, function (res) {
        if (res.success) {
            showToast("✅ Quiz saved successfully!", "success");
            $("#quizForm")[0].reset();
            $("#questionTable tbody").empty();
            $("#questionTable").hide();
            questions = [];
            $("#addQuestion").html('<i class="fa-solid fa-plus"></i> Add Question');
        }
    });
});
</script>

<?= $this->include('layouts/footer') ?>
