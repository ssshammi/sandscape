<?php
$url = $this->createURL('game/lobbychatupdate');

$last = end($messages);
$last = $last->messageId;


Yii::app()->clientScript->registerCssFile('_resources/css/lobby.css');
Yii::app()->clientScript->registerScriptFile('_resources/js/lobby.js');

Yii::app()->clientScript->registerScript('msgscripts', "
$('#writemessage').keypress(function(e) {
    if(e.which == 13) {
        $('#sendbtn').click();
    }
});

//5 sec delay before asking for more messages
setInterval(function() {
    updateMessages('{$url}')
}, 5000);
    
lastReceived = {$last};
");
?>

<h2>Lobby</h2>
<div class="span-5 border">
    <h3>Users</h3>
    <ul id="userlist">
        <?php foreach ($users as $user) { ?>
            <li><a href="#"><?php echo $user->name;
            ?></a></li>
        <?php } ?>
    </ul>
</div>
<div class="span-13 border">
    <h3>Chat</h3>
    <ul id="lobbychat">
        <?php foreach ($messages as $message) { ?>
            <li>
                <span>
                    <strong><?php echo $message->user->name; ?></strong>
                    [<?php echo Yii::app()->dateFormatter->formatDateTime(strtotime($message->sent), 'short'); ?>]:
                </span>
                <br />
                <?php echo CHtml::encode($message->message); ?>
            </li>
        <?php } ?>
    </ul>
</div>
<div class="span-6 last">
    <h3>Games</h3>
    <ul id="gamelist">
        <?php
        foreach ($games as $game) {
            $class = '';
            $url = '#';
            if ($game->running) {
                $class = 'success';
                $url = $this->createURL('game/spectate', array('id' => $game->gameId));
            } else {
                $class = 'info';
                $url = $this->createURL('game/join', array('id' => $game->gameId));
            }
            ?>
            <li class="<?php echo $class; ?>">
                <span><?php echo Yii::app()->dateFormatter->formatDateTime(strtotime($game->created), 'short', false); ?></span>
                <br />
                <span>by <?php echo $game->player10->name; ?></span>
            </li>
        <?php } ?>
    </ul>
</div>
<hr />
<div class="span-24 centered">
    <input type="text" class="text" id="writemessage" />
    <button type="button" onclick="sendMessage('<?php echo $this->createURL('game/sendlobbymessage'); ?>');" id="sendbtn">Send</button>
</div>