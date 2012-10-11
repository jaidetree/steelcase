<?php if( Messenger::has_any() ): ?>
    <ul class="messages">
        <?php foreach( Messenger::all() as $message ): ?>
        <li class="<?php $message->get('class') ?>"><?php $message->get('text') ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
