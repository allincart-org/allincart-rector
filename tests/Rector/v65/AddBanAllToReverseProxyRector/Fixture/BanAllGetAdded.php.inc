<?php
namespace Frosh\Rector\Tests\Rector\v65\AddBanAllToReverseProxyRector\Fixture;

class Test extends \Allincart\Storefront\Framework\Cache\ReverseProxy\AbstractReverseProxyGateway {

}
?>

-----
<?php
namespace Frosh\Rector\Tests\Rector\v65\AddBanAllToReverseProxyRector\Fixture;

class Test extends \Allincart\Storefront\Framework\Cache\ReverseProxy\AbstractReverseProxyGateway
{
    public function banAll()
    {
        $this->ban([]);
    }
}
?>
