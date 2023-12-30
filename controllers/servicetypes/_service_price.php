<p>
    <?= $record->service_price ?> <i class="icon-<?= $record->getCurrency() ?>"></i>
    <?php if ($record->getCurrency() == 'PLN') : ?> PLN <?php endif ?>
</p>