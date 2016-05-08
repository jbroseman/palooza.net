using System;
using System.Collections.Generic;
using Palooza.Net.Web.Models.Components;

namespace Palooza.Net.Web.Models.ViewModels
{
    public class GameDashboardVM
    {
        public List<GamePlayer> Players { get; set; }
        public List<GameBlind> Blinds { get; set; }
        public GameDetailsPartialVM Game { get; set; }

        public GameDashboardVM()
        {
            Players = new List<GamePlayer>();
            Blinds = new List<GameBlind>();
            Game = new GameDetailsPartialVM();
        }
    }
}