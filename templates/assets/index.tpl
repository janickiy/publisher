<!-- INCLUDE header.tpl -->

<p>+ <a href="./?t=add_url_price">Добавить ссылку на цену</a></p>

<div class="row">
    <div class="col-lg-12">
        <form class="form-inline" style="margin-bottom: 20px; margin-top: 20px;" method="GET" name="searchform" action="${ACTION}">
            <div class="form-group">
                <input class="form-control form-warning input-sm" type="text" name="search" value="${SEARCH}" placeholder="модель или марка">
            </div>
            <input class="btn btn-info" type="submit" value="Найти">
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <label class="radio-inline"> <input class="CityChange" type="radio" value="1" <!-- IF '${CITY}' == '1' -->checked="checked"<!-- END IF --> name="city">Москва </label>
        <label class="radio-inline"> <input class="CityChange" type="radio" value="2" <!-- IF '${CITY}' == '2' -->checked="checked"<!-- END IF --> name="city">Санкт-Петербург </label>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <p class="text-right"><span class="IconExcel"></span><a title="скачать" href="./?t=price">скачать</a></p>
    </div>
</div>
<table width="100%" class="table table-striped table-bordered table-hover tablesaw-swipe"  data-tablesaw-mode="swipe">
    <thead>
    <tr>
        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Марка</th>
        <th class="title" scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Модель</th>
        <!-- BEGIN shops_header_row -->
        <th><a target="_blank" href="http://${URL}">${NAME}</a></th>
        <!-- END shops_header_row -->
    </tr>
    </thead>
    <tbody>
    <!-- BEGIN cars_row -->
    <tr >
        <td class="title">${CAR}</td>
        <td class="title">${MODEL}</td>
        <!-- BEGIN shops_row -->
        <td  <!-- IF '${STATUS}' == 'no' -->class="danger"<!-- END IF -->><!-- IF '${PRICE}' != '' --><a href="./?t=edit_url_price&id=${ID}">${PRICE}</a><!-- ELSE -->-<!-- END IF --></td>
        <!-- END shops_row -->
    </tr>
    <!-- END cars_row -->
    </tbody>
</table>
<script src="./js/dist/tablesaw.js"></script>
<script src="./js/dist/tablesaw-init.js"></script>
<link rel="stylesheet" href="./js/dist/tablesaw.css">

<script>
    var TablesawConfig = {
        i18n: {
            swipePreviousColumn: "The column before",
            swipeNextColumn: "The column after"
        },
        swipe: {
            horizontalThreshold: 45,
            verticalThreshold: 45
        }
    };

    $(document).on( "change", ".CityChange", function() {
        var city = $('input[name=city]:checked').val();
        document.cookie = "city=" + city;
        location.reload();
    });

</script>

<!-- INCLUDE footer.tpl -->