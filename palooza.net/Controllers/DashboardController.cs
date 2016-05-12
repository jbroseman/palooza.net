using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using palooza.net.Models;

namespace palooza.net.Controllers
{
    public class DashboardController : Controller
    {
        // GET: Dashboard
        public ActionResult Dashboard()
        {
            GameVM game = new GameVM()
            {
                Id = 1,
                Buyin = 10,
                Stack = 41500,
                Boost = 5,
                BoostStack = 20000
            };
            List<GamePlayerVM> players = new List<GamePlayerVM>()
            {
                new GamePlayerVM()
                {
                    Id = 1,
                    FirstName = "Jaime",
                    LastName = "Broseman",
                    BuyInCount = 1
                },
                new GamePlayerVM()
                {
                    Id = 2,
                    FirstName = "Jake",
                    LastName = "Henry",
                    BuyInCount = 1
                },
                new GamePlayerVM()
                {
                    Id = 3,
                    FirstName = "Scooter",
                    LastName = "Stephenson",
                    BuyInCount = 0
                },
                new GamePlayerVM()
                {
                    Id = 4,
                    FirstName = "Miranda",
                    LastName = "Pieren",
                    BuyInCount = 1
                }
            };
            List<GameBlindVM> blinds = new List<GameBlindVM>()
            {
                new GameBlindVM()
                {
                    Id = 1,
                    Small = 100,
                    Large = 200
                },
                new GameBlindVM()
                {
                    Id = 2,
                    Small = 200,
                    Large = 400
                },
                new GameBlindVM()
                {
                    Id = 3,
                    Small = 300,
                    Large = 600,
                    IsCurrent = true
                },
                new GameBlindVM()
                {
                    Id = 4,
                    Small = 400,
                    Large = 800,
                    ChipUpImg = ""
                }
            };
            List<GameChipVM> chips = new List<GameChipVM>()
            {
                new GameChipVM()
                {
                    Id = 1,
                    Value = 100,
                    Img = ""
                },
                new GameChipVM()
                {
                    Id = 2,
                    Value = 500,
                    Img = ""
                },
                new GameChipVM()
                {
                    Id = 3,
                    Value = 1000,
                    Img = ""
                },
                new GameChipVM()
                {
                    Id = 4,
                    Value = 5000,
                    Img = ""
                },
                new GameChipVM()
                {
                    Id = 5,
                    Value = 10000,
                    Img = ""
                },
                new GameChipVM()
                {
                    Id = 6,
                    Value = 20000,
                    Img = ""
                }
            };
            GameTimerVM timer = new GameTimerVM()
            {
                Minute = 20,
                Second = 0
            };
            DashboardVM vm = new DashboardVM()
            {
                Game = game,
                Players = players,
                Blinds = blinds,
                Chips = chips,
                Timer = timer
            };
            return View(vm);
        }
    }
}