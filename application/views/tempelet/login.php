
<div id="loginForm">                
    <?php echo form_open('site/login_validation'); ?>
    <fieldset id="body">
        <fieldset>
            <label for="email">اسم المستخدم</label>
            <input type="text" name="username" id="email" />
        </fieldset>
        <fieldset>
            <label for="password">كلمه السر</label>
            <input type="password" name="password" id="password" />
        </fieldset>
        <div class="search-submit-button left"><input type="submit" name="submit" value="دخول" /></div>

    </fieldset>

</form>
</div>
