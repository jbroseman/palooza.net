namespace palooza.domain.Models
{
    public class BoostType
    {
        public string Name { get; set; }
        public int Cost { get; set; }
        public Chip ValueChip { get; set; }

        public bool Equals(BoostType bt)
        {
            return bt.Name.Equals(Name)
                && bt.Cost == Cost
                && bt.ValueChip.Equals(ValueChip);
        }
    }
}
