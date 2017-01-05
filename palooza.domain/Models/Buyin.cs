using System;

namespace palooza.domain.Models
{
    public class Buyin
    {
        public DateTime TimeStamp { get; set; }
        public int Amount { get; set; }

        public bool Equals(Buyin b)
        {
            return b.TimeStamp.Equals(TimeStamp) && b.Amount == Amount;
        }
    }
}
