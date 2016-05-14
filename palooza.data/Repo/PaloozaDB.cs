using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace palooza.data.Repo
{
    public class PaloozaDB
    {
        public static SqlConnection Connection { get; set; }
        public static ChipRepo Chips { get; set; }

        public PaloozaDB(string connectionString)
        {
            Connection = new SqlConnection(connectionString);
            Chips = new ChipRepo();
        }
    }
}
