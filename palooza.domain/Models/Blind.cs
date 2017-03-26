using System.Collections.Generic;

namespace palooza.domain.Models
{
    public class Blind
    {
        public int Big { get; set; }
        public int Small { get; set; }

        public bool Equals(Blind blind)
        {
            return blind.Big == Big && blind.Small == Small;
        }
    }
}
