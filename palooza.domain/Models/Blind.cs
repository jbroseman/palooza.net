using System.Collections.Generic;

namespace palooza.domain.Models
{
    public class Blind
    {
        public int Big;
        public int Small;

        public bool Equals(Blind blind)
        {
            return blind.Big == Big && blind.Small == Small;
        }
    }
}
