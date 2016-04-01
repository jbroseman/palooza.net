using System;
using System.Collections.Generic;

namespace palooza.domain.Models
{
    public class GamePlayer
    {
        public DateTime BuyinTime { get; set; }
        public DateTime EliminationTime { get; set; }
        public IEnumerable<Buyin> Buyins { get; set; }
        public IEnumerable<Boost> Boosts { get; set; }
        public Payout Payout { get; set; }
    }
}
