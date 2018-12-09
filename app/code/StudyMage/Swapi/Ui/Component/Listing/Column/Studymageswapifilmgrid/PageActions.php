<?php
namespace StudyMage\Swapi\Ui\Component\Listing\Column\Studymageswapifilmgrid;

class PageActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource["data"]["items"])) {
            foreach ($dataSource["data"]["items"] as & $item) {
                $name = $this->getData("name");
                $id = "X";
                if(isset($item["film_id"]))
                {
                    $id = $item["film_id"];
                }
                if(isset($item['film_id'])) {

                    $item[$name]['edit'] = [
                        'href' => $this->getContext()->getUrl('studymage_swapi_admin/film/edit', ['film_id' => $id]),
                        'label' => __('Edit')
                    ];
                    $title = $item['title'];
                    $item[$name]['delete'] = [
                        'href' => $this->getContext()->getUrl('studymage_swapi_admin/film/delete', ['film_id' => $id]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete %1', $title),
                            'message' => __('Are you sure you want to delete a %1 record?', $title)
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }    
    
}
