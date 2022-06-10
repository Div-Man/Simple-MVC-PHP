<style>
    a {
        margin: 10px;
    }
</style>


<div><a href="http://localhost/?users=add">Добавить нового юзера</a></div>

<p>Список юзеров</p>

<?php foreach($data["users"] as $user): ?>
      <div>
        <span>Имя: <a href="?users=getUserId&id=<?php echo $user["id"];?>"><?php echo $user["name"]; ?></a><span>
        <span>Возраст: <?php echo $user["age"]; ?><span>
    </div><br>
<?php endforeach;?>


<div style="text-align: center">
    <?php foreach($data["pagination"]->get() as $page): ?>
        <?php echo $page;?>
    <?php endforeach;?>
        
    
</div>
<a href="/">На главную страницу</a>
