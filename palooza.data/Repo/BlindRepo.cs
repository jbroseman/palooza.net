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
    public class BlindRepo : IPaloozaRepository<Blind>
    {
        public void Delete(IEnumerable<Blind> obj)
        {
            if (obj.Count() > 0)
                foreach (Blind o in obj)
                    PaloozaDB.Connection.Execute(
                        @"DELETE Blind WHERE Big = @Big AND Small = @Small", new
                        {
                            Big = o.Big,
                            Small = o.Small
                        });
        }

        public void Delete(Blind obj)
        {
            PaloozaDB.Connection.Delete<Blind>(obj);
        }

        public IEnumerable<Blind> List()
        {
            return PaloozaDB.Connection.Query<Blind>("SELECT * FROM Blind");
        }

        public void Save(IEnumerable<Blind> obj)
        {
            throw new NotImplementedException();
        }

        public void Save(Blind obj)
        {
            if (List().Contains(obj))
                PaloozaDB.Connection.Update<Blind>(obj);
            else
                PaloozaDB.Connection.Insert<Blind>(obj);
        }
    }
}
