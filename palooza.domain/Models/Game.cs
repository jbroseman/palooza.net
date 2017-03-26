using System;
using System.Collections.Generic;

namespace palooza.domain.Models
{
    public class Game
    {
        public DateTime StartTime { get; set; }
        public DateTime EndTime { get; set; }
        public int Buyin { get; set; }
        // how do we fit in chipstacks, do we even need to 
        public IEnumerable<GameTable> Tables { get; set; }
        public IEnumerable<GameBlind> Blinds { get; set; }

        public bool Equals(Game g)
        {
            return g.StartTime.Equals(StartTime)
                && g.EndTime.Equals(EndTime);
        }
    }
}
