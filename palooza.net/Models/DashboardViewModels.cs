using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace palooza.net.Models
{
    public class DashboardVM
    {
        public GameVM Game { get; set; }
        public List<GamePlayerVM> Players { get; set; }
        public List<GameBlindVM> Blinds { get; set; }
        public List<GameChipVM> Chips { get; set; }
        public GameTimerVM Timer { get; set; }

        public DashboardVM()
        {
            Game = new GameVM();
            Players = new List<GamePlayerVM>();
            Blinds = new List<GameBlindVM>();
            Chips = new List<GameChipVM>();
            Timer = new GameTimerVM();
        }
    }

    public class GameVM
    {
        public int Id { get; set; }
        public string Theme { get; set; }
        public int Buyin { get; set; }
        public int Stack { get; set; }
        public int Boost { get; set; }
        public int BoostStack { get; set; }
    }

    public class GamePlayerVM
    {
        public int Id { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string Img { get; set; }
        public int BuyInCount { get; set; }
        public string Placement { get; set; }
    }

    public class GameBlindVM
    {
        public int Id { get; set; }
        public int Small { get; set; }
        public int Large { get; set; }
        public string ChipUpImg { get; set; }
        public bool IsCurrent { get; set; }
    }

    public class GameChipVM
    {
        public int Id { get; set; }
        public int Value { get; set; }
        public string Img { get; set; }
    }

    public class GameTimerVM
    {
        public int Minute { get; set; }
        public int Second { get; set; }
    }
}
