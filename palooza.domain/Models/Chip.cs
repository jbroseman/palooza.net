namespace palooza.domain.Models
{
    public class Chip
    {
        public int ID { get; set; }
        public int Value { get; set; }
        public string Color { get; set; }
        public string TrimColor { get; set; }
        // todo
        //public Image { get; set; }

        public bool Equals(Chip chip)
        {
            return Value == chip.Value && Color == chip.Color;
        }
    }
}
