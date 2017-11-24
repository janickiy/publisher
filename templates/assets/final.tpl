<!-- INCLUDE header.tpl -->
<div class="page_wrapper">
    <div class="page">
        <div class="section">
            <img src="./images/logo.png" />
            <!-- IF '${PROJECT}' != '' -->
            <h1>${PROJECT}</h1>
            <!-- IF '${NEW}' != '' --><div class="title">Ваш проект готов!</div><!-- END IF -->
            <ul class="page_list">
                <!-- BEGIN pages_row -->
                <li><a target="_blank" href="${PAGE}">${NAME}</a></li>
                <!-- END pages_row -->
            </ul>
            <a href="./" class="success">Загрузить еще проект?</a>
            <!-- ELSE -->
            <h1>Проекты</h1>
            <ul class="page_list">
                <!-- BEGIN project_row -->
                <!-- IF '${NAME}' != '' -->
                <li><a href="./?t=final&project=${NAME}">${NAME}</a></li><!-- END IF -->
                <!-- END project_row -->
            </ul>
            <!-- END IF -->
        </div>
    </div>
</div>
<!-- INCLUDE footer.tpl -->