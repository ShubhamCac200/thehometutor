<?= $this->include('layouts/header') ?>

<h2 class="section-title">🧠 <?= esc($quizTitle['title']) ?></h2>

<form id="quizAttemptForm" class="card" autocomplete="off">
    <?php if (!empty($questions)): ?>
        <?php $qnum = 1; ?>
        <?php foreach ($questions as $q): ?>
            <div class="question-block">
                <h4><?= $qnum++ ?>. <?= esc($q['question']) ?></h4>
                <div class="options">
                    <?php foreach (['a', 'b', 'c', 'd'] as $opt): ?>
                        <label>
                            <input type="radio" name="question_<?= $q['id'] ?>" value="<?= $opt ?>"> 
                            <?= esc($q['option_' . $opt]) ?>
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

<style>
    .question-block {
        margin-bottom: 20px;
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        background: #f9f9f9;
    }
    .options label {
        display: block;
        margin-bottom: 6px;
    }
    .btn-submit {
        background: #28a745;
        color: white;
        padding: 10px 18px;
        border-radius: 6px;
        border: none;
        cursor: pointer;
    }
    .btn-submit:hover {
        background: #218838;
    }
</style>

<?= $this->include('layouts/footer') ?>
