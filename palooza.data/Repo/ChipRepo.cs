using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using palooza.domain.Models;
using System.Data.SqlClient;

using Dapper;
using DapperExtensions;

namespace palooza.data.Repo
{
    public class ChipRepo : IPaloozaRepository<Chip>
    {
        public void Delete(IEnumerable<Chip> obj)
        {
            if (obj.Count() > 0)
                foreach (Chip o in obj)
                    PaloozaDB.Connection.Execute(
                        @"DELETE Chip WHERE Color = @Color AND Value = @Value", new
                        {
                            Color = o.Color,
                            Value = o.Value
                        });
        }

        public void Delete(Chip obj)
        {
            PaloozaDB.Connection.Delete<Chip>(obj);
        }

        public IEnumerable<Chip> List()
        {
            return PaloozaDB.Connection.Query<Chip>("SELECT * FROM Chip");
        }

        public void Save(IEnumerable<Chip> obj)
        {
            throw new NotImplementedException();
        }

        public void Save(Chip obj)
        {
            if (List().Contains(obj))
                PaloozaDB.Connection.Update<Chip>(obj);
            else
                PaloozaDB.Connection.Insert<Chip>(obj);
        }
    }
}
