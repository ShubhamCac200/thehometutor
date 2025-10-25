<?= $this->include('layouts/header') ?>

<h2 class="section-title">🧠 <?= esc($quizTitle['title']) ?></h2>

<form id="quizAttemptForm" class="card" autocomplete="off">
    <?= csrf_field() ?>
    <?php if (!empty($questions)): ?>
        <?php $qnum = 1; ?>
        <?php foreach ($questions as $q): ?>
            <div class="question-block" data-qid="<?= $q['id'] ?>">
                <h4><?= $qnum++ ?>. <?= esc($q['question']) ?></h4>
                <div class="options">
                    <?php foreach(['A','B','C','D'] as $opt): ?>
                        <label>
                            <input type="radio" name="question_<?= $q['id'] ?>" value="<?= $opt ?>"> 
                            <?= esc($q['option_' . strtolower($opt)]) ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn-submit">✅ Submit Quiz</button>
    <?php else: ?>
        <p>No questions found for this quiz.</p>
    <?php endif; ?>
</form>

<div id="quizResult" class="card" style="display:none; margin-top:20px; text-align:center;"></div>

<style>
.question-block { margin-bottom: 20px; padding: 15px; border: 1px solid #e0e0e0; border-radius: 10px; background: #f9f9f9; }
.options label { display: block; margin-bottom: 6px; cursor: pointer; }
.btn-submit { background: #28a745; color: white; padding: 10px 18px; border-radius: 6px; border: none; cursor: pointer; font-size: 16px; }
.btn-submit:hover { background: #218838; }
#quizResult { font-size: 18px; padding: 20px; border-radius: 10px; background: #e9f7ef; border: 1px solid #c3e6cb; }
.correct { background: #d4edda; }
.incorrect { background: #f8d7da; }
</style>

<script>
document.getElementById('quizAttemptForm').addEventListener('submit', function(e){
    e.preventDefault();
    const formData = new FormData(this);

    fetch('<?= base_url("admin/quiz/submit/".$quizTitle['id']) ?>', {
        method: 'POST',
        body: formData,
        credentials: 'same-origin'
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            // Highlight answers
            for(const [qid, ans] of Object.entries(data.answers)){
                const correct = data.correct[qid];
                document.querySelectorAll(`.question-block[data-qid="${qid}"] input`).forEach(input => {
                    input.disabled = true;
                    const parent = input.parentElement;
                    if(input.value.toUpperCase() === correct.toUpperCase()){
                        parent.classList.add('correct');
                    } else if(input.checked){
                        parent.classList.add('incorrect');
                    }
                });
            }

            // Show score and motivational message
            let percentage = (data.score / data.total) * 100;
            let message = '';
            if(percentage === 100){
                message = '🎉 Perfect Score! Amazing job!';
            } else if(percentage >= 80){
                message = '👍 Great work! Keep it up!';
            } else if(percentage >= 50){
                message = '🙂 Good effort! You can do even better!';
            } else {
                message = '💪 Don’t worry! Keep practicing and you will improve!';
            }

            document.getElementById('quizResult').innerHTML = `<strong>Score:</strong> ${data.score} / ${data.total}<br>${message}`;
            document.getElementById('quizResult').style.display = 'block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        } else {
            alert(data.message || 'Something went wrong!');
        }
    })
    .catch(err => console.error(err));
});
</script>

<?= $this->include('layouts/footer') ?>
