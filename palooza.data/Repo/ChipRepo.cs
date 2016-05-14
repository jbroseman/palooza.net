using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using palooza.domain.Models;
using System.Data.SqlClient;

namespace palooza.data.Repo
{
    public class ChipRepo : IPaloozaRepository<Chip>
    {
                

        public void Delete(Chip chip)
        {
            throw new NotImplementedException();
        }

        public Chip Find(int id)
        {
            throw new NotImplementedException();
        }

        public IEnumerable<Chip> List()
        {
            throw new NotImplementedException();
        }

        public void Save(Chip obj)
        {
            string qry = string.Format(
                @"UPDATE Chip SET Value = {0}, ...",
                obj.Value);


            throw new NotImplementedException();
        }
    }
}
