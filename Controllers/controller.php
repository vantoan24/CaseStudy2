<?Php
class Controllers
{
    public function renderView($path, $param = [])
    {
        include './Views' . $path;
    }
}