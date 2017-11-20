<!-- INCLUDE header.tpl -->

<div class="page_wrapper">
    <div class="page">
        <div class="section">
            <form id="createProject">
            <img src="./images/logo.png" />
            <input type="text" class="form_control" name="name" placeholder="Название проекта" />
            <button id="btn_create_project" class="btn">Создать проект</button>
            </form>
            <span id="result"></span>
        </div>
    </div>
</div>

<script>

    $(document).on( "click", "#btn_create_project", function() {
        var $form = $( this );
        var NameProject = $form.find( 'input[name="name"]' ).val();
        alert(NameProject);
        $.ajax({
            type: "GET",
            url: './?t=ajax&action=create_project&name=' + NameProject,
            dataType: "json",
            success: function(data){
                if (data != null && data.result != null) {

                }
            }
        });
    });

</script>

<!-- INCLUDE footer.tpl -->