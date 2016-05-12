using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(palooza.net.Startup))]
namespace palooza.net
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            //ConfigureAuth(app);
        }
    }
}
