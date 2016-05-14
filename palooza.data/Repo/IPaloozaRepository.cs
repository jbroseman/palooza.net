using System.Collections.Generic;
using System.Data.SqlClient;

namespace palooza.data.Repo
{
    public interface IPaloozaRepository <T> 
    {
        IEnumerable<T> List();
        T Find(int id);
        void Save(T obj);
        void Delete(T obj);
    }
}