namespace palooza.domain.Models
{
    public class Table
    {
        public string Name { get; set; }
        public int Seats { get; set; }

        public bool Equals(Table t)
        {
            return t.Name.Equals(Name);
        }
    }
}
