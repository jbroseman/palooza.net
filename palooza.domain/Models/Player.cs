namespace palooza.domain.Models
{
    public class Player
    {
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string DisplayName { get; set; }
        // public string Image { get; set; } // TODO 
        public string Quote { get; set; }

        public bool Equals(Player p)
        {
            return p.FirstName.Equals(FirstName)
                && p.LastName.Equals(LastName)
                && p.DisplayName.Equals(DisplayName);
        }
    }
}
