using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(PokerPalooza_MVC.Startup))]
namespace PokerPalooza_MVC
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
