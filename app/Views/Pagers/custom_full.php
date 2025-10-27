<?php
/**
 * Custom Pagination Template - Red/White Theme
 * Works with both simpleLinks() and links()
 * Responsive + Active Highlight + Page Info
 */
?>

<style>
    /* Pagination Wrapper */
    .pagination-wrapper {
        text-align: center;
        margin: 30px 0;
    }

    /* Pagination Container */
    .pagination {
        display: inline-flex;
        flex-wrap: wrap;
        gap: 6px;
        padding: 10px 14px;
        border-radius: 10px;
    }

    /* Page Links */
    .pagination a,
    .pagination span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border: 2px solid #f44336;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        color: #f44336;
        background-color: #fff;
        transition: all 0.25s ease;
    }

    .pagination a:hover {
        background-color: #f44336;
        color: #fff;
    }

    /* Active Page */
    .pagination .active {
        background-color: #f44336;
        color: #fff;
        box-shadow: 0 2px 8px rgba(244, 67, 54, 0.3);
    }

    /* Disabled Links */
    .pagination .disabled {
        opacity: 0.4;
        cursor: not-allowed;
        border-color: #ccc;
    }

    /* Prev / Next Buttons */
    .pagination .prev,
    .pagination .next {
        padding: 0 10px;
        width: auto;
        font-size: 0.95rem;
        font-weight: 500;
    }

    /* Responsive */
    @media (max-width: 600px) {
        .pagination a,
        .pagination span {
            width: 32px;
            height: 32px;
            font-size: 0.85rem;
        }
    }
</style>

<div class="pagination-wrapper">
    <div class="pagination">
        <!-- Previous -->
        <?php if ($pager->hasPrevious()) : ?>
            <a href="<?= $pager->getPreviousPage() ?>" class="prev">&larr; Prev</a>
        <?php else : ?>
            <span class="disabled prev">&larr; Prev</span>
        <?php endif; ?>

        <!-- Page Numbers (only if not simple pager) -->
        <?php if (method_exists($pager, 'links')) : ?>
            <?php foreach ($pager->links() as $link) : ?>
                <?php if ($link['active']) : ?>
                    <span class="active"><?= $link['title'] ?></span>
                <?php else : ?>
                    <a href="<?= $link['uri'] ?>"><?= $link['title'] ?></a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Next -->
        <?php if ($pager->hasNext()) : ?>
            <a href="<?= $pager->getNextPage() ?>" class="next">Next &rarr;</a>
        <?php else : ?>
            <span class="disabled next">Next &rarr;</span>
        <?php endif; ?>
    </div>

    <!-- Page info (only if supported) -->
    <?php if (method_exists($pager, 'getCurrentPage') && method_exists($pager, 'getPageCount')) : ?>
        <p style="margin-top: 8px; color: #555; font-size: 0.9rem;">
            Page <?= $pager->getCurrentPage() ?> of <?= $pager->getPageCount() ?>
        </p>
    <?php endif; ?>
</div>
