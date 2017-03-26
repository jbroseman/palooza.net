using palooza.data.Repo;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace palooza.net.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult Index()
        {
            PaloozaDB Database = new PaloozaDB(ConfigurationManager.ConnectionStrings["Palooza"].ConnectionString);

            PaloozaDB.Connection.Open();

            string poop = PaloozaDB.Connection.ServerVersion != null ? "It worked!" : "fuck.";

            ViewBag.poop = poop;

            PaloozaDB.Connection.Close();

            return View();
        }

        public ActionResult About()
        {
            ViewBag.Message = "Your application description page.";

            return View();
        }

        public ActionResult Contact()
        {
            ViewBag.Message = "Your contact page.";

            return View();
        }
    }
}