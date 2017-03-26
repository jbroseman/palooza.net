using System;

namespace palooza.domain.Models
{
    public class Boost
    {
        public DateTime TimeStamp { get; set; }
        public BoostType Type { get; set; }

        public bool Equals(Boost boost)
        {
            return boost.TimeStamp.Equals(TimeStamp) && boost.Type.Equals(Type);
        }
    }
}
