<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 12.03.17
 * Time: 11:49
 */

namespace app\modules\main\components\filter;




class AccFilter extends PreviewFilter implements PreviewFilterInterface
{
    public $accs = [];
    public function setPreview($preview){
        $this->preview = $preview;
    }

    public function setParams($param)
    {

        $this->accs =$param;

       // TODO: Implement setParams() method.
    }

    public function getResult()
    {
       return $this->useFilter();
        // TODO: Implement getResult() method.
    }

    protected function useFilter()
    {
        if($this->accs){
            $accs = $this->accs['accs'];

            if($accs) {

                $filterAcc = function ($elem) use ($accs) {

                    foreach ($accs as $acc) {
                        // dd(trim($acc), 10, true);
                        if ($elem['accommodation'] == trim($acc)) {
                            return $elem;
                        }
                    }


                };
                return array_filter($this->preview, $filterAcc);
            }
            return false;

        }

    }

}