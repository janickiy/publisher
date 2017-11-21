<!-- INCLUDE header.tpl -->

<div class="page_wrapper">
    <div class="page">
        <div class="section">
            <form id="createProject">
            <img src="./images/logo.png" />

            <input type="text" class="form_control" name="name" placeholder="Название проекта" />
            <div id="btn_create_project" class="btn">Создать проект</div>

            </form>
            <div style="margin: 20px 0 20px;" id="result"></div>
        </div>
    </div>
</div>


<script>
    $(document).on( "click", "#btn_create_project", function() {
        var NameProject = $('#createProject').find('input[name="name"]').val();

        var request = $.ajax({
            url: "./?t=ajax&action=create_project",
            type: "POST",
            data: {name : NameProject},
            dataType: "json"
        });

        request.done(function(data) {
            if (data.result == 'yes') {
                window.location.href = './?t=add_pic&project=' + data.name_project;
            } else {
                $("#result").html('<p class="text-danger">Ошибка веб приложения! Действия не были выполнены</p>');
            }
        });

        request.fail(function(jqXHR, textStatus) {
            $("#result").html('<p class="text-danger">Request failed: ' + textStatus + '</p>');
        });
    });
</script>

<!-- INCLUDE footer.tpl -->