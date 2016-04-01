using System;

namespace palooza.domain.Models
{
    public class GameBlind
    {
        public int Length { get; set; } // minutes
        public DateTime StartTime { get; set; }
        public DateTime EndTime { get; set; }
        public Blind Blind { get; set; }
        public Chip EndOfBlindBoost { get; set; }
    }
}
