<div>
    <form name="formComent" method="post" action="">
        <label for="textarea"></label>
        <p>
            <textarea name="comentario" cols='80' rows='5'>
            </textarea>
        </p>
        <p>
            <imput type="submit" <?php if(isset$GET_['id']))(?>name="reply"<?else(?>name="comentar"<?php)?> value="comenta">
        </p>
    </form>
</div>
<br>
