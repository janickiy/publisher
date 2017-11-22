<!-- INCLUDE header.tpl -->
<div class="page_wrapper">
    <div class="page">
        <div class="section">
            <img src="./images/logo.png" />
<!-- IF '${PROJECT}' != '' -->
<ul>
    <!-- BEGIN pages_row -->
    <li><a href="${PAGE}">${NAME}</a></li>
    <!-- END pages_row -->
</ul>
<!-- ELSE -->
            <h1>Проекты</h1>
            <ul class="page_list">
                <!-- BEGIN project_row -->
                <!-- IF '${NAME}' != '' -->    <li><a href="./?t=final&project=${NAME}">${NAME}</a></li><!-- END IF -->
                <!-- END project_row -->
            </ul>

</ul>
<!-- END IF -->
        </div>
</div>
</div>

<!-- INCLUDE footer.tpl -->