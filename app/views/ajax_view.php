<?php

switch (Core_Array::getGet('action'))
{
    case 'search_model':
        $model = trim(Core_Array::getRequest('model'));
        $rows = [];

        foreach( $data->searchModel($model) as $row) {
            $rows[] = [
                "id" => $row['id'],
                'name' => $row['name']
            ];
        }

        $content = '{"item":' . json_encode($rows) . '}';
        Main::showJSONContent($content);

        break;
}