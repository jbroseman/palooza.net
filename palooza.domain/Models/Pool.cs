using System.Collections.Generic;

namespace palooza.domain.Models
{
    public class Pool
    {
        public IEnumerable<Payout> Payouts { get; set; }
    }
}
